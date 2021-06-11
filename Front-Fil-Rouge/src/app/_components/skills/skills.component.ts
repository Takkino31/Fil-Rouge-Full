import { Component, OnInit } from '@angular/core';
import {SkillsService} from '../../services/skills.service';
import {Observable} from 'rxjs';
import {Skill} from '../Models/skills';

@Component({
  selector: 'app-skills',
  templateUrl: './skills.component.html',
  styleUrls: ['./skills.component.scss']
})
export class SkillsComponent implements OnInit {
  skills: Observable<Skill[]> | undefined;
  skillToDetails!: Skill;
  constructor(
    private skillServices: SkillsService
  ) { }


  ngOnInit(): void {
  }

  getSkill(skill: Skill): any{
    // this.skillToDetails = skill;
    // console.log(skill);
  }
}
