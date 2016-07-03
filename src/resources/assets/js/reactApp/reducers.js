import {combineReducers} from 'redux';

const sparkScriptVariables = (state=[],action) => {

	switch(action.type) {

		case 'STORE_SPARKSCRIPTVARIABLES':

			return Object.assign({}, action.variables);

		default:

			return state;

	}

}

const reducers = combineReducers({
	sparkScriptVariables,
});

export default reducers;