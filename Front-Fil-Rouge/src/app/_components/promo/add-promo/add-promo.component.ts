import { Component, OnInit } from '@angular/core';
import {Promo} from '../../Models/promo';

@Component({
  selector: 'app-add-promo',
  templateUrl: './add-promo.component.html',
  styleUrls: ['./add-promo.component.scss']
})
export class AddPromoComponent implements OnInit {
  // @ts-ignore
  public promo = new Promo();
  constructor() { }

  ngOnInit(): void {
  }

}
