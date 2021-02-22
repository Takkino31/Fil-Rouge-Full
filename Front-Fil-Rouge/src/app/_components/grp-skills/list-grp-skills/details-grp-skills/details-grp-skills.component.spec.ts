import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DetailsGrpSkillsComponent } from './details-grp-skills.component';

describe('DetailsGrpSkillsComponent', () => {
  let component: DetailsGrpSkillsComponent;
  let fixture: ComponentFixture<DetailsGrpSkillsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DetailsGrpSkillsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(DetailsGrpSkillsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
