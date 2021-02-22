import { Component, OnInit } from '@angular/core';
import {UserService} from '../../../services/user.service';
import {User} from '../../Models/utilisateur';
import {HttpClient} from '@angular/common/http';
import {environment} from '../../../../environments/environment';

@Component({
  selector: 'app-list-users',
  templateUrl: './list-users.component.html',
  styleUrls: ['./list-users.component.scss']
})
export class ListUsersComponent implements OnInit {
  users: User[] = [];
  pages: any;
  itemspage = 8;
  currentPage = 1;
  nbrItems: any;

  constructor(
    private userService: UserService,
    private httpClient: HttpClient
  ) { }

  ngOnInit(): void {
    this.getUserToList(this.currentPage);
    this.getNbrUser();
  }


  getUserToList(current: number): any{
    this.userService.getUsers(current).subscribe(
      response => {
        this.users = response;
      },
      error => {
        return error;
      }
    );
  }

  getNbrUser(): void{
    this.httpClient.get<any>(environment.link + 'admin/nbrusers').subscribe(
      response => {
        this.nbrItems = response;
        this.pages = Math.floor(this.nbrItems / this.itemspage) + 1 ;
      }
    );
  }

  getNextPage(): void{
    if (this.currentPage < this.pages){
      this.currentPage += 1;
      this.getUserToList(this.currentPage);
    }
  }

  getPreviousPage(): void{
    if (this.currentPage > 1){
      this.currentPage -= 1;
      this.getUserToList(this.currentPage);
    }
  }

  onDelete(id: number): void{
    this.userService.deleteUser(id).subscribe(
      response => {
        alert('Delete');
      }
    );
  }

}
