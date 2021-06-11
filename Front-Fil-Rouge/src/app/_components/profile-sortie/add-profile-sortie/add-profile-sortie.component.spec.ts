import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AddProfileSortieComponent } from './add-profile-sortie.component';

describe('AddProfileSortieComponent', () => {
  let component: AddProfileSortieComponent;
  let fixture: ComponentFixture<AddProfileSortieComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AddProfileSortieComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AddProfileSortieComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
