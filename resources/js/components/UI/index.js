import MyNavBar from "./MyNavBar";
import MyUserGrid from "./MyUserGrid";
import MyInput from "./MyInput";
import MyPopup from "./MyPopup";
import MyCategoryGrid from "./MyCategoryGrid";
import ShowUser from "../Pages/Admin/Users/ShowUser"
import CreateCategory from "../Pages/Admin/Category/CreateCategory";
import ShowCategory from "../Pages/Admin/Category/ShowCategory";
export default [
    MyNavBar,
    MyUserGrid,
    MyInput,
    MyPopup,
    MyCategoryGrid,
    ShowUser,
    CreateCategory,
    ShowCategory,
]
// import Vue from 'vue';
//
// const requireComponent = require.context(
//     '../UI', // Путь к вашей папке с компонентами
//     false, // Не включать подпапки
//     /\.vue$/ // Только файлы с расширением .vue
// );
//
// requireComponent.keys().forEach(fileName => {
//     const componentConfig = requireComponent(fileName);
//     const componentName = fileName
//         .split('/')
//         .pop()
//         .replace(/\.\w+$/, '');
//
//     Vue.component(componentName, componentConfig.default || componentConfig);
// });
