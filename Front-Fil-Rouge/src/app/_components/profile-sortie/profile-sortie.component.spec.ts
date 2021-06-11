import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ProfileSortieComponent } from './profile-sortie.component';

describe('ProfileSortieComponent', () => {
  let component: ProfileSortieComponent;
  let fixture: ComponentFixture<ProfileSortieComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ProfileSortieComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ProfileSortieComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
