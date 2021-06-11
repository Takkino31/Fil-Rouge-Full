import { Injectable } from '@angular/core';
import {HTTP_INTERCEPTORS, HttpEvent, HttpHandler, HttpInterceptor, HttpRequest} from '@angular/common/http';
import {Observable} from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class InterceptorService implements HttpInterceptor{
  constructor() {
  }
  intercept(req: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    const idToken = localStorage.getItem('auth-token');
    if (idToken){
      req = req.clone({
        headers: req.headers.set('Authorization', 'Bearer ' + idToken)
      });
      req = req.clone({
        headers: req.headers.set('Accept', 'application/json')
      });
      return next.handle(req);
    }else{
      return next.handle(req);
    }
  }
}

export const ErrorInterceptorService = {
  provide: HTTP_INTERCEPTORS,
  useClass: InterceptorService,
  multi: true
};
