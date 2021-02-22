import { Component, OnInit } from '@angular/core';
import {ReferentialService} from '../../../services/referential.service';
import {Referentiel} from '../../Models/referentiel';

@Component({
  selector: 'app-list-referentiels',
  templateUrl: './list-referentiels.component.html',
  styleUrls: ['./list-referentiels.component.scss']
})
export class ListReferentielsComponent implements OnInit {
  referentials: Referentiel[] = [];
  constructor(
    private referentielService: ReferentialService
  ) {
  }

  ngOnInit(): void {
    this.getReferentials();
  }

  getReferentials(): any{
    this.referentielService.getReferentials().subscribe(
      response => {
        this.referentials = response;
      },
      error => {
        console.log('cannot get list referential');
      },
    );
  }
}
