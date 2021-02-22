import { Component, OnInit } from '@angular/core';
import {Referentiel} from '../../Models/referentiel';

@Component({
  selector: 'app-add-referentiel',
  templateUrl: './add-referentiel.component.html',
  styleUrls: ['./add-referentiel.component.scss']
})
export class AddReferentielComponent implements OnInit {
  // @ts-ignore
  public referential = new Referentiel();
  constructor() { }

  ngOnInit(): void {
  }

}
