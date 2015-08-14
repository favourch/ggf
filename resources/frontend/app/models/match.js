import DS from 'ember-data';

export default DS.Model.extend({
  round:        DS.attr('number'),
  homeTeam:     DS.attr('string'),
  awayTeam:     DS.attr('string'),
  homeScore:    DS.attr('number'),
  awayScore:    DS.attr('number'),
  status:       DS.attr('string'),
  tournamentId: DS.attr('number')
});
