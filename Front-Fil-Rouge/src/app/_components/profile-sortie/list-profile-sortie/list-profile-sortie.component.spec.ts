import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListProfileSortieComponent } from './list-profile-sortie.component';

describe('ListProfileSortieComponent', () => {
  let component: ListProfileSortieComponent;
  let fixture: ComponentFixture<ListProfileSortieComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ListProfileSortieComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ListProfileSortieComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
