import "preact-cli/lib/lib/webpack/polyfills";
import { Component } from "preact";
import habitat from "preact-habitat";
import store from "./store";
import Field from "./Field/Field";

class App extends Component {
	constructor (props) {
		super(props);

		if (process.env.NODE_ENV === "development")
			console.log(props);

		store("set", props);
	}

	render () {
		return <Field />;
	}
}

habitat(App).render({
	selector: "craft-bookings",
	clean: true,
});
