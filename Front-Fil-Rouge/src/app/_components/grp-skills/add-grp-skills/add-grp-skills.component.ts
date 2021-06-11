import { Component, OnInit } from '@angular/core';
import {GrpSkills} from '../../Models/grp-skills';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {Skill} from '../../Models/skills';
import {IDropdownSettings} from 'ng-multiselect-dropdown';
import {SkillsService} from '../../../services/skills.service';
import {GrpSkillsService} from '../../../services/grp-skills.service';
import {ActivatedRoute, Router} from '@angular/router';

@Component({
  selector: 'app-add-grp-skills',
  templateUrl: './add-grp-skills.component.html',
  styleUrls: ['./add-grp-skills.component.scss']
})
export class AddGrpSkillsComponent implements OnInit {
  addGrpSkillsForm !: FormGroup;
  grpSkillsToUpdate!: GrpSkills;
  skills: Skill [] = [];
  dropdownList = [];
  selectedItems = [];
  dropdownSettings!: IDropdownSettings ;
  queryParamsId!: number;

  constructor(
    private fb: FormBuilder,
    private skillService: SkillsService,
    private grpSkillsService: GrpSkillsService,
    private activatedRoute: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {

    this.dropdownSetting();
    this.getSkills();
    if (this.activatedRoute.snapshot.params.id){
      this.getSkills();
      this.dropdownSetting();
      this.showDataInFormEdit();
    }
    else {

      this.initGrpSkills();
    }
  }

  value(): string{
    return !this.grpSkillsToUpdate ? 'Ajouter' : 'Modifier';
  }

  initGrpSkills(grpSkills?: GrpSkills): any{

      this.addGrpSkillsForm = this.fb.group({
        libelle: ['', [Validators.required, Validators.minLength(5), Validators.maxLength(70)]],
        descriptif: ['', [Validators.required, Validators.minLength(5), Validators.maxLength(150)]],
        skills: ['', Validators.required]
      });
      if (this.grpSkillsToUpdate){
        grpSkills = this.grpSkillsToUpdate;
        for (const skill  of grpSkills.competences) {
          // @ts-ignore
          this.selectedItems.push({item_id: skill.id, item_text: skill.libelle});
        }
        this.addGrpSkillsForm.patchValue({
          descriptif: grpSkills.descriptif,
          libelle: grpSkills.libelle,
          skills: this.selectedItems
      });
    }
  }

  isValidInput(fieldName: string): boolean{
    return this.addGrpSkillsForm.controls[fieldName].invalid &&
      (this.addGrpSkillsForm.controls[fieldName].dirty || this.addGrpSkillsForm.controls[fieldName].touched);
  }

  dropdownSetting(): void{
    this.dropdownSettings = {
      singleSelection: false,
      idField: 'item_id',
      textField: 'item_text',
      selectAllText: 'Select Tout',
      unSelectAllText: 'unSelect All',
      itemsShowLimit: 5,
      allowSearchFilter: true
    };
  }

  getSkills(): any{
    this.skillService.getSkills().subscribe(
      response => {
        this.skills = response;
        this.dropdownList = [];
        // @ts-ignore
        this.skills.forEach(skill => this.dropdownList.push({item_id: skill.id, item_text: skill.libelle}));
      }
    );
  }


  onItemSelect(item: any): any {
    console.log(item);
  }
  onDeSelect(item: any): any{
    console.log(item);
  }
  onSelectAll(items: any): any {
    console.log(items);
  }

  onAddGrpSkills(): any{
    // @ts-ignore
    this.addGrpSkillsForm.value.skills.forEach(skill => this.selectedItems.push('/api/admin/competences/' + skill.item_id));
    const grpSkills = {
      libelle: this.addGrpSkillsForm.value.libelle,
      descriptif: this.addGrpSkillsForm.value.descriptif,
      competences: this.selectedItems
    };
    this.grpSkillsService.addGrpSkills(grpSkills).subscribe(
      response => {
        console.log('ok', response);
      },
      error => {
        console.log('error', error);
      },
    );
  }

  showDataInFormEdit(): any{
    if (this.activatedRoute.snapshot.params.id){
      this.activatedRoute.params.subscribe(
        params => {
          this.queryParamsId = params.id;
          this.grpSkillsService.getSkillsOfGroupeSkills(this.queryParamsId).subscribe(
              data => {
                this.grpSkillsToUpdate = data;
                this.initGrpSkills(this.grpSkillsToUpdate);
              }
          );
        }
      );
    }
  }

  onEditGrpSkills(): any{
    this.skills = [];
    // @ts-ignore
    this.addGrpSkillsForm.value.skills.forEach(skill => this.skills.push('/api/admin/competences/' + skill.item_id));
    const grpSkills = {
      libelle: this.addGrpSkillsForm.value.libelle,
      descriptif: this.addGrpSkillsForm.value.descriptif,
      competences: this.skills
    };
    console.log(grpSkills);
    this.grpSkillsService.updateGrpSkills(this.queryParamsId, grpSkills).subscribe(
      response => {
        console.log('ok update');
      },
      error => {
        console.log('error update grp skills');
      }
    );
  }

  onSubmit(): any{
    !this.grpSkillsToUpdate ? this.onAddGrpSkills() : this.onEditGrpSkills();
  }
}
