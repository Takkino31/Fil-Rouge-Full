import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GrpSkillsComponent } from './grp-skills.component';

describe('GrpSkillsComponent', () => {
  let component: GrpSkillsComponent;
  let fixture: ComponentFixture<GrpSkillsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GrpSkillsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GrpSkillsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
