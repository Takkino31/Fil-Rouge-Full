import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {LoginComponent} from './_components/login/login.component';
import {AdminComponent} from './_components/admin/admin.component';
import {TeacherComponent} from './_components/teacher/teacher.component';
import {CmComponent} from './_components/cm/cm.component';
import {StudentComponent} from './_components/student/student.component';
import {ProfileComponent} from './_components/admin/profile/profile.component';
import {AddPromoComponent} from './_components/promo/add-promo/add-promo.component';
import {PromoComponent} from './_components/promo/promo.component';
import {ListReferentielsComponent} from './_components/referentiels/list-referentiels/list-referentiels.component';
import {AddReferentielComponent} from './_components/referentiels/add-referentiel/add-referentiel.component';
import {ListGrpSkillsComponent} from './_components/grp-skills/list-grp-skills/list-grp-skills.component';
import {AddGrpSkillsComponent} from './_components/grp-skills/add-grp-skills/add-grp-skills.component';
import {SkillsComponent} from './_components/skills/skills.component';
import {AddSkillComponent} from './_components/skills/add-skill/add-skill.component';
import {ListSkillsComponent} from './_components/skills/list-skills/list-skills.component';
import {ListUsersComponent} from './_components/users/list-users/list-users.component';
import {DetailsUserComponent} from './_components/users/details-user/details-user.component';
import {ListProfileSortieComponent} from './_components/profile-sortie/list-profile-sortie/list-profile-sortie.component';
import {AddProfileSortieComponent} from './_components/profile-sortie/add-profile-sortie/add-profile-sortie.component';
import {ProfileSortieComponent} from './_components/profile-sortie/profile-sortie.component';
import {GrpSkillsComponent} from './_components/grp-skills/grp-skills.component';
import {ReferentielsComponent} from './_components/referentiels/referentiels.component';

const routes: Routes = [
  {path : '', redirectTo: '/login', pathMatch: 'full'},
  {path : 'login', component: LoginComponent},
  {path : 'admin', component: AdminComponent,
     children: [
        {
          path: 'promo', component: PromoComponent,
            children: [
              { path : 'add-promo', component : AddPromoComponent}
            ]
        },
       {
         path: 'referential', component: ReferentielsComponent,
         children: [
           {path: 'list', component: ListReferentielsComponent},
           {path: 'add-referential', component: AddReferentielComponent}
         ]
       },
       {
         path: 'group-skills', component: GrpSkillsComponent,
         children: [
           {path: 'list', component: ListGrpSkillsComponent},
           {path: 'add-groupe-competences', component: AddGrpSkillsComponent},
           {path: 'edit-groupe-competences/:id', component: AddGrpSkillsComponent}
         ]
       },
       {
         path: 'skill', component: SkillsComponent,
         children: [
           {path: 'list', component: ListSkillsComponent},
           {path: 'add-skill', component: AddSkillComponent},
           {path: 'edit-skill/:id', component: AddSkillComponent}
         ]
       },
       {
         path: 'profil-sortie', component: ProfileSortieComponent,
         children: [
           {path: 'list', component: ListProfileSortieComponent},
           {path: 'add-profil-sortie', component: AddProfileSortieComponent}
         ]
       },
       {
         path: 'users',
         children: [
           {path: 'list', component: ListUsersComponent},
           {path: 'add-user', component: DetailsUserComponent},
           {path: 'edit-user/:id', component: DetailsUserComponent}
         ]
       },
       {
         path: 'profil', component: ProfileComponent,
         children: [
           {path: 'list', component: ListUsersComponent},
           {path: 'add-profil', component: DetailsUserComponent}
         ]
       }
     ]
  },
  {path: 'teacher' , component: TeacherComponent},
  {path: 'cm' , component: CmComponent},
  {path: 'student' , component: StudentComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
