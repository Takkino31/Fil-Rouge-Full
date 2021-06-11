import { Component, Input, OnInit } from '@angular/core';
import {Referentiel} from '../../../Models/referentiel';

@Component({
  selector: 'app-details-referentiel',
  templateUrl: './details-referentiel.component.html',
  styleUrls: ['./details-referentiel.component.scss']
})
export class DetailsReferentielComponent implements OnInit {
  @Input() referential!: Referentiel;
  constructor() { }

  ngOnInit(): void {
  }

}
