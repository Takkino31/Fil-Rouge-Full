import { Component, OnInit } from '@angular/core';
import {Skill} from '../../Models/skills';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {GrpSkillsService} from '../../../services/grp-skills.service';
import {GrpSkills} from '../../Models/grp-skills';
import {SkillsService} from '../../../services/skills.service';
import { IDropdownSettings } from 'ng-multiselect-dropdown';
import {ActivatedRoute, Router} from '@angular/router';
import {count} from 'rxjs/operators';

@Component({
  selector: 'app-add-skill',
  templateUrl: './add-skill.component.html',
  styleUrls: ['./add-skill.component.scss']
})
export class AddSkillComponent implements OnInit {
  addSkillForm !: FormGroup;
  groupesSkills: GrpSkills [] = [];
  dropdownList = [];
  selectedItems = [];
  dropdownSettings!: IDropdownSettings ;
  groupeCompetences = [];
  queryParamsId!: number;
  skillToUpdate!: Skill;
  selectedItemsToEdit = [];

  constructor(
    private fb: FormBuilder,
    private skillsService: SkillsService,
    private groupeSkillsService: GrpSkillsService,
    private activatedRoute: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.dropdownSetting();
    this.getGrpSkills();
    if (this.activatedRoute.snapshot.params.id){
      this.showDataInFormEdit();
    }
    else {
      this.initAddSkill();
    }
  }

  initAddSkill(skillToUpdate?: any): void{
    this.addSkillForm = this.fb.group({
      libelle: ['', [ Validators.required, Validators.minLength(5), Validators.maxLength(50)]],
      descriptif: ['', [ Validators.required, Validators.minLength(10), Validators.maxLength(100)]],
      groupeAction1: ['', [ Validators.required, Validators.minLength(10), Validators.maxLength(100)]],
      groupeAction2: ['', [ Validators.required, Validators.minLength(10), Validators.maxLength(100)]],
      groupeAction3: ['', [ Validators.required, Validators.minLength(10), Validators.maxLength(100)]],
      critereEvaluation1: ['', [ Validators.required, Validators.minLength(10), Validators.maxLength(100)]],
      critereEvaluation2: ['', [ Validators.required, Validators.minLength(10), Validators.maxLength(100)]],
      critereEvaluation3: ['', [ Validators.required, Validators.minLength(10), Validators.maxLength(100)]],
      grpSkills: ['', Validators.required]
    });

    if (this.skillToUpdate){
        for (const grpSkills of this.skillToUpdate.groupeCompetences) {
          // @ts-ignore
          this.selectedItems.push({item_id: grpSkills.id, item_text: grpSkills.libelle});
        }
        this.addSkillForm.patchValue({
          libelle: this.skillToUpdate.libelle,
          descriptif: this.skillToUpdate.descriptif,
          groupeAction1: this.skillToUpdate.niveaux[0].groupeAction,
          groupeAction2: this.skillToUpdate.niveaux[1].groupeAction,
          groupeAction3: this.skillToUpdate.niveaux[2].groupeAction,
          critereEvaluation1: this.skillToUpdate.niveaux[0].critereEvaluation,
          critereEvaluation2: this.skillToUpdate.niveaux[1].critereEvaluation,
          critereEvaluation3: this.skillToUpdate.niveaux[2].critereEvaluation,
          grpSkills: this.selectedItems
          });
    }}

  isValidInput( fieldName: string): boolean{
    return this.addSkillForm.controls[fieldName].invalid &&
      (this.addSkillForm.controls[fieldName].dirty || this.addSkillForm.controls[fieldName].touched);
  }

  getGrpSkills(): any{
    this.groupeSkillsService.getGroupeSkills().subscribe(
      response => {
        this.groupesSkills = response;
        // console.log(response);
        this.dropdownList = [];
        // @ts-ignore
        this.groupesSkills.forEach(grpSkills => this.dropdownList.push({item_id: grpSkills.id, item_text: grpSkills.libelle
          }));
      },
      error => {
        console.log('error: Cannot  get grpSkill\'s list');
      },
    );
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

  onAddSkill(): any{
    console.log(this.addSkillForm.value.grpSkills);
    // @ts-ignore
    // tslint:disable-next-line:max-line-length
    this.addSkillForm.value.grpSkills.forEach(grpSkills => this.groupeCompetences.push('/api/admin/groupecompetences/' + grpSkills.item_id));
    console.log(this.groupeCompetences);
    // @ts-ignore
    const skill: Skill = {
        libelle: this.addSkillForm.value.libelle,
        descriptif: this.addSkillForm.value.descriptif,
        niveaux: [
          {
            libelle: 'niveau 1',
            groupeAction: this.addSkillForm.value.groupeAction1,
            critereEvaluation: this.addSkillForm.value.critereEvaluation1,
          },
          {
            libelle: 'niveau 2',
            groupeAction: this.addSkillForm.value.groupeAction2,
            critereEvaluation: this.addSkillForm.value.critereEvaluation2,
          },
          {
            libelle: 'niveau 3',
            groupeAction: this.addSkillForm.value.groupeAction3,
            critereEvaluation: this.addSkillForm.value.critereEvaluation3,
          }
        ],
         groupeCompetences : this.groupeCompetences
      }
    ;
    console.log(skill);
    this.skillsService.postSkill(skill).subscribe(
      response => {
        console.log('success');
        this.router.navigate(['admin/skill/list']);
      },
      error => {
        console.log('error : cannot add a skill');
      }
    );
    console.log(this.addSkillForm.value);
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

  showDataInFormEdit(): any{
    if (this.activatedRoute.snapshot.params.id){
      this.activatedRoute.params.subscribe(
        params => {
          this.queryParamsId = +params.id;
          this.skillsService.getSkillById(this.queryParamsId).subscribe(
            data => {
              this.skillToUpdate = data;
              this.initAddSkill(this.skillToUpdate);
            }
          );
        }
      );
    }
  }

  onEditSkill(): any{
    console.log(this.addSkillForm.value.grpSkills);
    // @ts-ignore
    // tslint:disable-next-line:max-line-length
    this.addSkillForm.value.grpSkills.forEach(grpSkills => this.groupeCompetences.push('/api/admin/groupecompetences/' + grpSkills.item_id));
    const skillToEdit = {
        libelle: this.addSkillForm.value.libelle,
        descriptif: this.addSkillForm.value.descriptif,
        niveaux: [
          {
            libelle: 'niveau 1',
            groupeAction: this.addSkillForm.value.groupeAction1,
            critereEvaluation: this.addSkillForm.value.critereEvaluation1,
          },
          {
            libelle: 'niveau 2',
            groupeAction: this.addSkillForm.value.groupeAction2,
            critereEvaluation: this.addSkillForm.value.critereEvaluation2,
          },
          {
            libelle: 'niveau 3',
            groupeAction: this.addSkillForm.value.groupeAction3,
            critereEvaluation: this.addSkillForm.value.critereEvaluation3,
          }
        ],
        groupeCompetences : this.groupeCompetences
      }
    ;
    this.skillsService.updateSkill(this.queryParamsId, skillToEdit).subscribe(
      response => {
        console.log('update skill ok');
        this.router.navigate(['/admin/skill/list']);
      },
      error => {
        console.log('error update skill');
      },
    );
  }

  onSubmit(): any{
    !this.skillToUpdate ? this.onAddSkill() : this.onEditSkill();
  }
  value(): string{
    return !this.skillToUpdate ? 'Ajouter' : 'Modifier';
  }

  getItems(item: any): any{
    console.log(item);
  }
}
