import {Injectable, OnInit} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs';
import {environment} from '../../environments/environment';
import {Skill} from '../_components/Models/skills';

@Injectable({
  providedIn: 'root'
})
export class SkillsService {

  constructor(
    private httpClient: HttpClient,
  ) { }

  getSkills(): Observable<Skill[]> {
    // @ts-ignore
    return this.httpClient.get(environment.linkAdmin + 'competences' + environment.isDrop);
  }

  postSkill(skill: Skill): Observable<any>{
    return this.httpClient.post(environment.linkAdmin + 'competences', skill);
  }

  updateSkill(id: number, skill: any): Observable<any>{
    return this.httpClient.put(environment.linkAdmin + 'competences/' + id, skill);
  }

  deleteSkill(id: number): Observable<any>{
    return this.httpClient.delete(environment.linkAdmin + 'competences/' + id);
  }

  getSkillById(id: number): Observable<Skill>{
    // @ts-ignore
    return this.httpClient.get( environment.linkAdmin + 'competences/' + id);
  }
}
