export class ProfileSortie {
  id: number;
  libelle: string;
  isDrop: boolean;
  constructor( id: number, libelle: string, isDrop: boolean)
  {
    this.id = id;
    this.libelle = libelle;
    this.isDrop = isDrop;
  }
}



