import {GrpSkills} from './grp-skills';

export interface Referentiel {
  id: number;
  libelle: string;
  presentation: string;
  programme: any;
  critereEvaluation: any;
  critereAdmission: any;
  groupeCompetences: GrpSkills[];
}



