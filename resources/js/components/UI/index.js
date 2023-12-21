import MyNavBar from "./MyNavBar";
import MyUserGrid from "./MyUserGrid";
import MyInput from "./MyInput";
export default [
    MyNavBar,
    MyUserGrid,
    MyInput,
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
