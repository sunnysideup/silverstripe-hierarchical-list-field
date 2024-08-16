function HierarchicalListFieldExpand (element) {
  const parentLi = element.parentNode.parentNode
  const subList = parentLi.querySelector('ul')
  const expandIcon = element

  if (subList.style.display === 'none' || subList.style.display === '') {
    subList.style.display = 'block'
    expandIcon.innerHTML = '&#9660;' // Unicode for ▼
  } else {
    subList.style.display = 'none'
    expandIcon.innerHTML = '&#9654;' // Unicode for ▶
  }
}
