import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {environment} from '../../environments/environment';
import {Observable} from 'rxjs';
import {Profile} from '../_components/Models/profile';

@Injectable({
  providedIn: 'root'
})
export class ProfileService {

  constructor(private httpClient: HttpClient) { }

  getProfil(): Observable<any>{
    return this.httpClient.get(environment.link + 'admin/profils' + environment.isDrop);
  }

  getProfilById(id: number): any{
    return this.httpClient.get(environment.link + 'admin/profils' + id);
  }

  addProfil(profile: any): Observable<any>{
    return this.httpClient.post(environment.linkAdmin + 'profils', profile);
  }
}
