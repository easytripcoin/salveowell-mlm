function renderNode(node) {
    if (!node) return '';
    return `
        <div class="text-center m-2">
            <div class="card" style="width: 10rem;">
                <div class="card-body">
                    <h6 class="card-title">${node.name}</h6>
                    <small class="text-muted">@${node.username}</small>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                ${node.left ? renderNode(node.left) : '<div class="placeholder"></div>'}
                ${node.right ? renderNode(node.right) : '<div class="placeholder"></div>'}
            </div>
        </div>`;
}

document.getElementById('genealogy-tree').innerHTML = renderNode(treeData);