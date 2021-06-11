import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListGrpSkillsComponent } from './list-grp-skills.component';

describe('ListGrpSkillsComponent', () => {
  let component: ListGrpSkillsComponent;
  let fixture: ComponentFixture<ListGrpSkillsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ListGrpSkillsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ListGrpSkillsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
