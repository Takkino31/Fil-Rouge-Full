import { Component, OnInit } from '@angular/core';
import { ProfileService } from 'src/app/services/profile.service';
import {Profile} from '../../../../Models/profile';

@Component({
  selector: 'app-details-profile',
  templateUrl: './details-profile.component.html',
  styleUrls: ['./details-profile.component.scss']
})
export class DetailsProfileComponent implements OnInit {
  profiles!: Profile [];
  constructor(
    private profileService: ProfileService

  ) {
  }

  ngOnInit(): void {
    this.getProfiles();
  }

  getProfiles(): void{
    this.profileService.getProfil().subscribe(
      response => {
        this.profiles = response;
        console.log(this.profiles);
      }
    );
  }
}
