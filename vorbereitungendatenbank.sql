INSERT INTO series(series_id, series_name, series_category, series_description) VALUES
(1, 'The Rookie' , 'Action, Krimi, Drama, Komödie' , 'John Nolan hat spät mit seinem Alter in LAPD angefangen und muss sich nun im Einsatz beweisen.'),
(2, 'S.W.A.T.' , 'Action, Krimi, Drama' , 'Eine Spezialeinheit des LAPD übernimmt besonders gefärliche Einsätze in LA und muss sich im Team, als auch in gesellschaftlicher Spannung beweisen.');

INSERT INTO movie(movie_id, movie_name, movie_category, movie_description) VALUES
(1, 'Attack On Titan (Last Attack)' , 'Anime, Action, Dark Fantasy, Drama' , 'Erens Plan zur globalen Zerstörung eskaliert, während seine Freunde versuchen, ihn aufzuhalten. Inmitten von Verrat und Verlusten steht die Menschheit vor ihrer größten Bedrohung.');

INSERT INTO user_series (user_id, series_id, status) VALUES 
(6, 1, 'Weiterschauen'),
(6, 2, 'Weiterschauen');

INSERT INTO user_movie (user_id, movie_id, status) VALUES 
(6, 1, 'bereits angeschaut');