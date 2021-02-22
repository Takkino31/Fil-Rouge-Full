import { Level1, Level2, Level3} from './level';

export interface Skill{
  // id: number;
  id: number;
  libelle: string;
  descriptif: string;
  niveaux: [Level1, Level2, Level3];
  groupeCompetences: string [];
}



