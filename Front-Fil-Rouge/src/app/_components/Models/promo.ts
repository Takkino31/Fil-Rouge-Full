export class Promo {
  langue: string;
  titre: string;
  description: string;
  lieu: string;
  dateDebut: Date;
  dateFin: Date;
  referentials: any;

  constructor( langue: string , titre: string, description: string, lieu: string, dateDebut: Date,
               dateFin: Date, referentials: any )
  {
    this.langue = langue;
    this.titre = titre;
    this.description = description;
    this.lieu = lieu;
    this.dateDebut = dateDebut;
    this.dateFin = dateFin;
    this.referentials = referentials;
  }
}



