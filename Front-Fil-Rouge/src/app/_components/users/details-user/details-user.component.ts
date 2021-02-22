import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {ProfileService} from '../../../services/profile.service';
import {Profile} from '../../Models/profile';
import {FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';
import {User} from '../../Models/utilisateur';
import {UserService} from '../../../services/user.service';
import {ActivatedRoute, Router} from '@angular/router';

@Component({
  selector: 'app-details-user',
  templateUrl: './details-user.component.html',
  styleUrls: ['./details-user.component.scss']
})
export class DetailsUserComponent implements OnInit {
  userToUpdate !: User;
  profiles: Profile [] = [];
  user: User[] | undefined;
  addUserForm: any = FormGroup;
  queryParamsId!: number;
  file: any;
  localUrl !: any[];

  constructor(
    private fb: FormBuilder,
    private profilService: ProfileService,
    private userService: UserService,
    private activatedRoute: ActivatedRoute,
    private router: Router
  ) {
  }

  ngOnInit(): void {
    this.getProfil();
    this.initForm();
    if (this.activatedRoute.snapshot.params.id){
      this.activatedRoute.params.subscribe(
        params => {
          this.queryParamsId = +params.id;
          // console.log(this.queryParamsId);
          this.userService.getUserById(this.queryParamsId).subscribe(
              data => {
                this.userToUpdate = data;
                this.initForm(this.userToUpdate);
                this.file = this.userToUpdate.avatar;
              }
          );
        }
      );
    }
  }

  getProfil(): any{
    this.profilService.getProfil().subscribe(
        (response: Profile[]) => {
        this.profiles = response;
        this.profiles = this.profiles.filter(e => e.libelle !== 'APPRENANT');
      }
    );
  }

  initForm(value?: any): void{
    this.addUserForm = this.fb.group(
      {
        prenom: ['', Validators.required],
        nom: ['', Validators.required],
        password: ['', Validators.required],
        username: ['', Validators.required],
        email: ['', [Validators.required, Validators.email]],
        profil: ['', Validators.required],
        avatar: ['']
      }
    );

    if (this.userToUpdate){
      // console.log(this.userToUpdate.profil);
      this.addUserForm.patchValue({
        nom: value.nom,
        prenom: value.prenom,
        username: value.username,
        password: value.password,
        email: value.email,
        avatar: this.file,
        profil: value.profil.libelle
      });
    }
  }

  isValidInput(fieldName: string | number): boolean {
    return this.addUserForm.controls[fieldName].invalid &&
      (this.addUserForm.controls[fieldName].dirty || this.addUserForm.controls[fieldName].touched);
  }

  onFileSelect(event: any): void{
    if (event.target.files.length > 0) {
       this.file = event.target.files[0];
    }
  }

  onSubmit(): any{
    !this.userToUpdate ? this.onAdd() : this.onEdit();
  }

  onAdd(): any{
    const user = new FormData();
    user.append('nom', this.addUserForm.value.nom);
    user.append('prenom', this.addUserForm.value.prenom);
    user.append('email', this.addUserForm.value.email);
    user.append('username', this.addUserForm.value.username);
    user.append('profil', this.addUserForm.value.profil);
    if (this.addUserForm.value.avatar){
      user.append('avatar', this.file);
    }
    this.userService.addUser(user).subscribe(
      (response) => {
        console.log(response);
        // this.router.navigate(['admin/users/list']);
      },
      error => {
        return error;
      }
    );

  }

  onEdit(): any{
    const userEdit = new FormData();
    // userEdit = this.addUserForm.value;
    userEdit.append('nom', this.addUserForm.value.nom);
    userEdit.append('prenom', this.addUserForm.value.prenom);
    userEdit.append('email', this.addUserForm.value.email);
    userEdit.append('username', this.addUserForm.value.username);
    userEdit.append('password', this.addUserForm.value.password);
    userEdit.append('profil', this.addUserForm.value.profil);
    if ((this.addUserForm.value.avatar)){
      this.addUserForm.value.avatar = this.file;
      userEdit.append('avatar', this.file);
    }
    this.userService.updateUser(this.queryParamsId, userEdit).subscribe(
      response => {
        console.log(response);
        // this.router.navigate(['admin/users/list']);
      },
      error => {
        console.log('error edit user');
      }
    );
  }

  showAvatar(fieldName: string): boolean{
    // if (this.userToUpdate.avatar){
    //   this.localUrl = this.userToUpdate.avatar;
    //   console.log(this.localUrl);
    // }
    return this.addUserForm.controls[fieldName].dirty;
  }
  getPath(event: any): void{
    if (event.target.files && event.target.files[0]) {
      const reader = new FileReader();
      // tslint:disable-next-line:no-shadowed-variable
      reader.onload = ( event: any) => {
        this.localUrl = event.target.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  }
}
