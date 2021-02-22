import {Component, EventEmitter, OnInit, Output} from '@angular/core';
import {Skill} from '../../Models/skills';
import {GrpSkillsService} from '../../../services/grp-skills.service';
import {GrpSkills} from '../../Models/grp-skills';
import {ShareDataService} from '../../../behaviors/share-data.service';
import { SkillsService } from 'src/app/services/skills.service';

@Component({
  selector: 'app-list-skills',
  templateUrl: './list-skills.component.html',
  styleUrls: ['./list-skills.component.scss']
})
export class ListSkillsComponent implements OnInit {
  listGrpSkills: GrpSkills [] =  [];
  skills: Skill [] = [];


  constructor(
    private skillsServices: SkillsService,
    private grpSkillsServices: GrpSkillsService,
    private shareDataService: ShareDataService
  ) { }

  ngOnInit(): void {
    this.getListSkills();
  }

  getListSkills(): any{
    this.grpSkillsServices.getGroupeSkills().subscribe(
      response => {
        this.listGrpSkills = response;
        // @ts-ignore
        this.skills = this.listGrpSkills[0].competences;
        // console.log(this.skills);
      },
      error => {
        console.log(error);
      },
    );
  }

  getSKill(skill: Skill): Skill{
    return skill;
  }

  sendSkillToDetails(skill: Skill): void{
    this.shareDataService.setValue(skill);
  }


  getSkillsOfGrpSkills(grpSkill: GrpSkills): any{
    console.log(grpSkill.skills);
    this.skills = grpSkill.skills;
  }

  onDeleteSkill(id: number): any{
    this.skillsServices.deleteSkill(id).subscribe(
      response => {
        alert(id);
        console.log('deleted');
      },
      error => {
        console.log('not deleted');
      }
    );
  }

  getGrpSkillToDetails(id: any): any{
    console.log(id);
    this.grpSkillsServices.getSkillsOfGroupeSkills(id).subscribe(
      response => {
        // @ts-ignore
        this.skills = response.competences;
      },
      error => {
        console.log('error');
      }
    );
  }
}
