import { Injectable } from '@angular/core';
import {BehaviorSubject, Observable} from 'rxjs';
import {Skill} from '../_components/Models/skills';
import {GrpSkills} from '../_components/Models/grp-skills';

@Injectable({
  providedIn: 'root'
})
export class ShareDataService {
  grpSkills!: GrpSkills;
  private routerInfo: BehaviorSubject<GrpSkills>;

  constructor(
  ) {
    this.routerInfo = new BehaviorSubject<GrpSkills>(this.grpSkills);
  }
  setValue(newValue: any): any{
    this.routerInfo.next(newValue);
  }

  getValue(): Observable<GrpSkills>{
    return this.routerInfo.asObservable();
  }
}
