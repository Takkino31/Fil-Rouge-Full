import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs';
import {User} from '../_components/Models/utilisateur';
import {environment} from '../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  profilFilter = 'users?profil.libelle[]=ADMIN&profil.libelle[]=FORMATEUR&profil.libelle[]=CM';
  constructor(
    private httpClient: HttpClient,
  ) { }

  getUsers(current: any): Observable<User[]> {
    // @ts-ignore
    return this.httpClient.get(environment.linkAdmin + this.profilFilter + environment.isDrop + '&page=' + current);
  }

  addUser(user: any): Observable<void>{
    // @ts-ignore
    return this.httpClient.post(environment.link + 'admin/users', user);
  }

  getUserById(id: number): Observable<any>{
    // @ts-ignore
    return this.httpClient.get( environment.link + 'admin/users/' + id);
  }

  updateUser(id: number, user: any): Observable<any> {
    return this.httpClient.post(environment.link + 'admin/users/' + id, user);
  }

  deleteUser(id: number): Observable<any>{
    return this.httpClient.delete(environment.link + 'admin/users/' + id);
  }
}
