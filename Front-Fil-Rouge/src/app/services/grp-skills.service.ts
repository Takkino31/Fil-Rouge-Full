import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs';
import {environment} from '../../environments/environment';
import {GrpSkills} from '../_components/Models/grp-skills';

@Injectable({
  providedIn: 'root'
})
export class GrpSkillsService {

  constructor(
    private httpClient: HttpClient
  ) { }

  getGroupeSkills(): Observable<any> {
    return this.httpClient.get(environment.linkAdmin + 'groupecompetences' + environment.isDrop);
  }

  getSkillsOfGroupeSkills(id: number): Observable<any> {
    return this.httpClient.get(environment.linkAdmin + 'groupecompetences/' + id + environment.isDrop);
  }

  addGrpSkills(grpSkills: any): Observable<any>{
    return this.httpClient.post(environment.linkAdmin  + 'groupecompetences', grpSkills);
  }

  updateGrpSkills(id: number, grpSkills: any): Observable<any>{
    return this.httpClient.put(environment.linkAdmin + 'groupecompetences/' + id, grpSkills);
  }
}
