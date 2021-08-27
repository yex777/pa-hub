import ExampleComponent from "./components/ExampleComponent";
import User from "./components/user/User";
import Home from "./components/Home";
import UserSongs from "./components/user/UserSongs";

export const routes = [
    { path: '/', name:"home", component: Home},
    { path: '/example', name:"example",component: ExampleComponent},
    { path: '/user', name:"user",component: User, children: [
            {path: 'userSongs', name:"userSongs",component: UserSongs},
        ]
    },
    { path: '/user/songs', name:"userSongs",component: User},
];
