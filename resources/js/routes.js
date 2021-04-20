import ExampleComponent from "./components/ExampleComponent";
import User from "./components/user/User";
import Home from "./components/Home";

export const routes = [
    { path: '/', component: Home},
    { path: '/example', component: ExampleComponent},
    { path: '/user', component: User}
];
