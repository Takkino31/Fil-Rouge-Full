import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {Profile} from '../../../Models/profile';
import {ProfileService} from '../../../../services/profile.service';

@Component({
  selector: 'app-add-profile',
  templateUrl: './add-profile.component.html',
  styleUrls: ['./add-profile.component.scss']
})
export class AddProfileComponent implements OnInit {
  addProfileForm !: FormGroup;
  profileToUpdate!: Profile;

  constructor(
    private fb: FormBuilder,
    private profileService: ProfileService
  ) { }

  ngOnInit(): void {
    this.initAddProfile();
  }

  initAddProfile(value?: any): void{
    this.addProfileForm = this.fb.group({
      libelle: ['', [ Validators.required, Validators.minLength(2), Validators.maxLength(50)]]
    });
  }

  isValidInput( fieldName: string): boolean{
    return this.addProfileForm.controls[fieldName].invalid &&
      (this.addProfileForm.controls[fieldName].dirty || this.addProfileForm.controls[fieldName].touched);
  }

  value(): string{
    return !this.profileToUpdate ? 'Ajouter' : 'Modifier';
  }

  onAddProfile(): any{
    console.log(this.addProfileForm.value.libelle);
    this.profileService.addProfil(this.addProfileForm.value).subscribe(
      response => {
        console.log(response);
      },
      error => {
        console.log(error);
      }
    );

  }
}
