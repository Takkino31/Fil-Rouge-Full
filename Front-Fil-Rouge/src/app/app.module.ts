import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './_components/login/login.component';
import { SchoolDescComponent } from './_components/login/school-desc/school-desc.component';
import { LoginFormComponent } from './_components/login/login-form/login-form.component';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import { AdminComponent } from './_components/admin/admin.component';
import { TeacherComponent } from './_components/teacher/teacher.component';
import { CmComponent } from './_components/cm/cm.component';
import { StudentComponent } from './_components/student/student.component';
import { NavbarComponent } from './_components/navbar/navbar.component';
import { HeaderComponent } from './_components/header/header.component';
import { UsersComponent } from './_components/users/users.component';
import { ListUsersComponent } from './_components/users/list-users/list-users.component';
import { DetailsUserComponent } from './_components/users/details-user/details-user.component';
import { ProfileComponent } from './_components/admin/profile/profile.component';
import { ListProfileComponent } from './_components/admin/profile/list-profile/list-profile.component';
import { DetailsProfileComponent } from './_components/admin/profile/list-profile/details-profile/details-profile.component';
import { SkillsComponent } from './_components/skills/skills.component';
import { ListSkillsComponent } from './_components/skills/list-skills/list-skills.component';
import { DetailsSkillsComponent } from './_components/skills/details-skills/details-skills.component';
import { GrpSkillsComponent } from './_components/grp-skills/grp-skills.component';
import { ListGrpSkillsComponent } from './_components/grp-skills/list-grp-skills/list-grp-skills.component';
import { DetailsGrpSkillsComponent } from './_components/grp-skills/list-grp-skills/details-grp-skills/details-grp-skills.component';
import { ReferentielsComponent } from './_components/referentiels/referentiels.component';
import { ListReferentielsComponent } from './_components/referentiels/list-referentiels/list-referentiels.component';
// tslint:disable-next-line:max-line-length
import { DetailsReferentielComponent } from './_components/referentiels/list-referentiels/details-referentiel/details-referentiel.component';
import { ProfileSortieComponent } from './_components/profile-sortie/profile-sortie.component';
import { ListProfileSortieComponent } from './_components/profile-sortie/list-profile-sortie/list-profile-sortie.component';
import { DetailsProfileSortieComponent } from './_components/profile-sortie/list-profile-sortie/details-profile-sortie/details-profile-sortie.component';
import { AddProfileSortieComponent } from './_components/profile-sortie/add-profile-sortie/add-profile-sortie.component';
import { AddProfileComponent } from './_components/admin/profile/add-profile/add-profile.component';
import { AddSkillComponent } from './_components/skills/add-skill/add-skill.component';
import { AddGrpSkillsComponent } from './_components/grp-skills/add-grp-skills/add-grp-skills.component';
import { AddReferentielComponent } from './_components/referentiels/add-referentiel/add-referentiel.component';
import { PromoComponent } from './_components/promo/promo.component';
import { AddPromoComponent } from './_components/promo/add-promo/add-promo.component';
import {HttpClientModule} from '@angular/common/http';
import {ErrorInterceptorService} from './services/interceptor.service';
import { NgMultiSelectDropDownModule } from 'ng-multiselect-dropdown';
import { NgxPrintModule } from 'ngx-print';


@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    SchoolDescComponent,
    LoginFormComponent,
    AdminComponent,
    TeacherComponent,
    CmComponent,
    StudentComponent,
    NavbarComponent,
    HeaderComponent,
    UsersComponent,
    ListUsersComponent,
    DetailsUserComponent,
    ProfileComponent,
    ListProfileComponent,
    DetailsProfileComponent,
    SkillsComponent,
    ListSkillsComponent,
    DetailsSkillsComponent,
    GrpSkillsComponent,
    ListGrpSkillsComponent,
    DetailsGrpSkillsComponent,
    ReferentielsComponent,
    ListReferentielsComponent,
    DetailsReferentielComponent,
    ProfileSortieComponent,
    ListProfileSortieComponent,
    DetailsProfileSortieComponent,
    AddProfileSortieComponent,
    AddProfileComponent,
    AddSkillComponent,
    AddGrpSkillsComponent,
    AddReferentielComponent,
    PromoComponent,
    AddPromoComponent,
  ],
    imports: [
        BrowserModule,
        AppRoutingModule,
        FormsModule,
        ReactiveFormsModule,
        HttpClientModule,
        NgMultiSelectDropDownModule.forRoot(),
        NgxPrintModule

    ],
  providers: [
    ErrorInterceptorService,
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
