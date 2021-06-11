import {Component, Input, OnInit} from '@angular/core';
import {GrpSkills} from '../../../Models/grp-skills';

@Component({
  selector: 'app-details-grp-skills',
  templateUrl: './details-grp-skills.component.html',
  styleUrls: ['./details-grp-skills.component.scss']
})
export class DetailsGrpSkillsComponent implements OnInit {
  @Input() grpSkills!: GrpSkills;
  constructor() { }

  ngOnInit(): void {
  }

}
