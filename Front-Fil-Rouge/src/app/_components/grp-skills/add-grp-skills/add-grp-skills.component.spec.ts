import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AddGrpSkillsComponent } from './add-grp-skills.component';

describe('AddGrpSkillsComponent', () => {
  let component: AddGrpSkillsComponent;
  let fixture: ComponentFixture<AddGrpSkillsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AddGrpSkillsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AddGrpSkillsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
