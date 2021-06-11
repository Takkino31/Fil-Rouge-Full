import { Component, OnInit } from '@angular/core';
import {GrpSkillsService} from '../../../services/grp-skills.service';
import {GrpSkills} from '../../Models/grp-skills';

@Component({
  selector: 'app-list-grp-skills',
  templateUrl: './list-grp-skills.component.html',
  styleUrls: ['./list-grp-skills.component.scss']
})
export class ListGrpSkillsComponent implements OnInit {
  listGrpSkills: GrpSkills [] = [];
  constructor(
    private grpSkillsServices: GrpSkillsService
  ) { }

  ngOnInit(): void {
    this.getListGrpSkills();
  }

  getListGrpSkills(): void{
    this.grpSkillsServices.getGroupeSkills().subscribe(
      response => {
        this.listGrpSkills = response;
      },
      error => {
        console.log('cannot get list grp skills');
      },
    );
  }

}
