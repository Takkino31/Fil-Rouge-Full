import {Component, Input, OnInit} from '@angular/core';
import {Skill} from '../../Models/skills';
import {ShareDataService} from '../../../behaviors/share-data.service';
import {GrpSkillsService} from '../../../services/grp-skills.service';
import {SkillsService} from '../../../services/skills.service';

@Component({
  selector: 'app-details-skills',
  templateUrl: './details-skills.component.html',
  styleUrls: ['./details-skills.component.scss']
})
export class DetailsSkillsComponent implements OnInit {

  skillToReceive!: Skill;
  id!: number;

  constructor(
    private grpSkillsServices: GrpSkillsService,
    private skillsServices: SkillsService,
    private shareDataService: ShareDataService
  ) { }

  ngOnInit(): void {
    this.getLevelsOfFirstSkillsOfFirstGrpSkills();
    this.getSkillToDetails();
  }

  getLevelsOfFirstSkillsOfFirstGrpSkills(): any{
    this.grpSkillsServices.getGroupeSkills().subscribe(
      response => {
        // @ts-ignore
        this.skillToReceive = response[0].competences[0];
        // @ts-ignore
        this.id = this.skillToReceive.id;
      }
    );
  }

  getSkillToDetails(): any{
    this.shareDataService.getValue().subscribe(
      response => {
        this.skillToReceive = response;
      });
  }

  onDeleteSkill(id: number): any{
    this.skillsServices.deleteSkill(id).subscribe(
      response => {
        console.log(response);
        location.reload();
      },
      error => {
        console.log(error);
      }
    );
  }

}
