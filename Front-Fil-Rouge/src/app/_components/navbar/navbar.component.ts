import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.scss']
})
export class NavbarComponent implements OnInit {
  visibility: boolean | undefined;

  constructor() { }

  ngOnInit(): void {
  }

  show(): void{
    this.visibility = !this.visibility;
  }
}
