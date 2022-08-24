import React from 'react';
import moment from "moment";


interface QuizzResultsProps {
    quizzId: string,
    releaseDate: string,
    note?: string,
    created_at: string,
    title: string,
    obtained?: boolean,
    opened?: boolean,
}

let defaultProps: QuizzResultsProps = {
    quizzId: '000000-0-0',
    releaseDate: '25/08/2022 00:00',
    note: undefined,
    created_at: '01/08/2022 à 14h30',
    title: 'Chargement...',
    obtained: false,
    opened: false,

}
//results later or now
export const QuizzResults: React.FC<QuizzResultsProps> = (props) => {
    const releaseDate = moment(props.releaseDate, 'DD/MM/YYYY HH:mm');
    const actualDate = moment();
    const later = releaseDate.diff(actualDate) > 0;


    return (
        <div className={'quizz-result-item'}>
            <div className={'quizz-result-item-title'}>
                <h2>{props.title}</h2>
                {!later ?
                    <button className={'quizz-result-item-button'}>
                        <img src={'/assets/svgs/See.svg'} alt={''}/>
                    </button> : ''
                }
            </div>
            <div className={'quizz-result-item-data'}>
                <div className={'quizz-result-item-data-infos'}>
                    {later ? <h6 className={'results-later'}>correction disponible dans <span>{releaseDate.fromNow()}</span></h6> : <h6 className={'results-now'}>correction disponible</h6>}
                    <h6 className={'realisedAt'}>réalisé le {props.created_at}</h6>
                </div>
                {(props.opened && !later) ?
                    <div className={'quizz-result-item-data-score'}>
                        <h6 className={(props.obtained ? 'ok' : 'wrong')}>{props.note}</h6>
                    </div> : ''
                }
            </div>

        </div>
    );
}
QuizzResults.defaultProps = defaultProps;
