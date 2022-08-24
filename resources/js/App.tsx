import React, {useState} from "react";
import ReactDOM from "react-dom";
import '../sass/App.scss';
import {QuizzResults} from "./Components/Quizz/QuizzResults";
import moment from "moment";

moment.updateLocale('en', {
    relativeTime: {
        future: " %s",
        past: "%s ago",
        s: 'quelques secondes',
        ss: '%d secondes',
        m: "1 minute",
        mm: "%d minutes",
        h: "1 heure",
        hh: "%d heures",
        d: "1 jour",
        dd: "%d jours",
        M: "1 mois",
        MM: "%d mois",
        y: "1 an",
        yy: "%d ans"
    }
});

export const App: React.FC = () => {
    const [test, setTest] = useState('');

    return(
        <div/>
    )

}

if (document.getElementById('App')) {
    ReactDOM.render(<App/>, document.getElementById('App'));
}
