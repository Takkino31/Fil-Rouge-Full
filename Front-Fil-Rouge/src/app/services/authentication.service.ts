import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Router} from '@angular/router';
import jwt_decode from 'jwt-decode';
import {Observable} from 'rxjs';
// import {JwtHelperService} from '@auth0/angular-jwt';

@Injectable({
  providedIn: 'root'
})
export class AuthenticationService {
  link = 'http://127.0.0.1:8000/api/login_check';
  constructor(
    private httpClient: HttpClient,
    private router: Router,
    // public jwtHelper: JwtHelperService
  ) { }

  public login(credentials: any): Observable<any>{
    return this.httpClient.post(this.link, credentials);
  }
  public decodeToken(token: any): string{
    return jwt_decode(token);
  }

  public saveToken(keyToken: string, value: string): void{
    localStorage.removeItem('auth-token');
    localStorage.setItem('auth-token', value);
  }
  public deleteToken(key: string): void{
    localStorage.removeItem(key);
  }

  getRoles(token: any): string{
    return token.roles[0];
  }
  navigateTo(role: string): any{
    switch (role) {
      case 'ROLE_ADMIN' : {
        this.router.navigate(['admin/skill/list']);
        break;
      }
      case 'ROLE_FORMATEUR' : {
        this.router.navigate( ['teacher'] );
        break;
      }
      case 'ROLE_CM' : {
        this.router.navigate( ['cm'] );
        break;
      }
      case 'ROLE_APPRENANT' : {
        this.router.navigate( ['student'] );
        break;
      }
      default: {
        this.router.navigate(['/login']);
      }
    }
  }

  // public isAuthenticated(): boolean{
  //   const token = localStorage.getItem('auth-token');
  //   return !this.jwtHelper.isTokenExpired('token');
  // }
}
