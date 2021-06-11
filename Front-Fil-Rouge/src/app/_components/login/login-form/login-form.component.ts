import { Component, OnInit } from '@angular/core';
import {User} from '../../Models/utilisateur';
import {AuthenticationService} from '../../../services/authentication.service';
import {Router} from '@angular/router';
import {FormBuilder, FormGroup, NgForm, Validators} from '@angular/forms';

@Component({
  selector: 'app-login-form',
  templateUrl: './login-form.component.html',
  styleUrls: ['./login-form.component.scss']
})
export class LoginFormComponent implements OnInit {
  loginForm: any = FormGroup;
  loginInvalid = false;

  constructor(
    private fb: FormBuilder,
    private authService: AuthenticationService,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.initForm();
  }

  initForm(): void{
    this.loginForm = this.fb.group(
      {
        username: ['', Validators.required],
        password: ['', Validators.required],
      }
    );
  }

  isValidInput(fieldName: string | number): boolean {
    return this.loginForm.controls[fieldName].invalid &&
      (this.loginForm.controls[fieldName].dirty || this.loginForm.controls[fieldName].touched);
  }

  onSubmit(): void{
    this.authService.login(this.loginForm.value).subscribe(
      (response) => {
        this.authService.saveToken('token', response.token);
        const tokenDecode = this.authService.decodeToken(response.token);
        const role = this.authService.getRoles(tokenDecode);
        this.authService.navigateTo(role);
        setTimeout(() => {
          this.authService.deleteToken('auth-token');
        }, 36000000);
        // this.router.navigate(['/login']);
      },
      error => {
        this.loginInvalid = true;
        return error;
      }
    )
    ;
  }
}
