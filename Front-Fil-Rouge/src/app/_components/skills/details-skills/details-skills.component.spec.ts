import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DetailsSkillsComponent } from './details-skills.component';

describe('DetailsSkillsComponent', () => {
  let component: DetailsSkillsComponent;
  let fixture: ComponentFixture<DetailsSkillsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DetailsSkillsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(DetailsSkillsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
