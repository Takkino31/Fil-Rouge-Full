import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DetailsProfileSortieComponent } from './details-profile-sortie.component';

describe('DetailsProfileSortieComponent', () => {
  let component: DetailsProfileSortieComponent;
  let fixture: ComponentFixture<DetailsProfileSortieComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DetailsProfileSortieComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(DetailsProfileSortieComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
