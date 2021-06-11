import { Injectable } from '@angular/core';
import {Observable} from 'rxjs';
import {environment} from '../../environments/environment';
import {HttpClient} from '@angular/common/http';
import {Referentiel} from '../_components/Models/referentiel';

@Injectable({
  providedIn: 'root'
})
export class ReferentialService {

  constructor(
    private httpClient: HttpClient
  ) {}

  getReferentials(): Observable<any>{
    return this.httpClient.get(environment.linkAdmin + 'referentiels' + environment.isDrop);
  }
}
