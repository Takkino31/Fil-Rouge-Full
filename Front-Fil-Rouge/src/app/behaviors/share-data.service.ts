import { Injectable } from '@angular/core';
import {BehaviorSubject, Observable} from 'rxjs';
import {Skill} from '../_components/Models/skills';

@Injectable({
  providedIn: 'root'
})
export class ShareDataService {
  skill!: Skill;
  private routerInfo: BehaviorSubject<Skill>;

  constructor(
  ) {
    this.routerInfo = new BehaviorSubject<Skill>(this.skill);
  }
  setValue(newValue: any): any{
    this.routerInfo.next(newValue);
    // console.log(newValue);
  }

  getValue(): Observable<Skill>{
    return this.routerInfo.asObservable();
  }
}
