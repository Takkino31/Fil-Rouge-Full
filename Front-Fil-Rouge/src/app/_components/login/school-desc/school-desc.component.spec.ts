import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SchoolDescComponent } from './school-desc.component';

describe('SchoolDescComponent', () => {
  let component: SchoolDescComponent;
  let fixture: ComponentFixture<SchoolDescComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SchoolDescComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(SchoolDescComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
