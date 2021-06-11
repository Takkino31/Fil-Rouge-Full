import { Component, OnInit } from '@angular/core';
import {ProfileSortie} from '../../Models/profile-sortie';

@Component({
  selector: 'app-add-profile-sortie',
  templateUrl: './add-profile-sortie.component.html',
  styleUrls: ['./add-profile-sortie.component.scss']
})
export class AddProfileSortieComponent implements OnInit {
  // @ts-ignore
  profileSortie = new ProfileSortie();
  constructor() { }

  ngOnInit(): void {
  }

}
